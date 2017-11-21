
<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>


<!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
<script src="https://cdn.webrtc-experiment.com/gumadapter.js"></script>
<body>
    <article>



<div class="row">

  <div class="col-md-6">
        <section class="experiment recordrtc">



            <div class="embed-responsive embed-responsive-4by3">

            <video controls muted class="embed-responsive-item">

            </video>
        </div>

        <button class="btn-lg btn-danger">Start Recording</button>

        <div style="text-align: center; display: none;">
            <button id="save-to-disk">Save To Disk</button>
            <button id="open-new-tab">Open New Tab</button>
            <button id="upload-to-server">Upload To Server</button>
        </div>

        </section>
      </div>


      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-4by3">
          <video controls class="embed-responsive-item">
              <source id="mp4Source" src="storage/videos/users/1/madrugada.mp4" type="video/mp4">
              Your browser does not support the video tag.
          </video>
        <div>


      </div>

        <script>
            (function () {
                var params = {},
                        r = /([^&=]+)=?([^&]*)/g;

                function d(s) {
                    return decodeURIComponent(s.replace(/\+/g, ' '));
                }

                var match, search = window.location.search;
                while (match = r.exec(search.substring(1))) {
                    params[d(match[1])] = d(match[2]);

                    if (d(match[2]) === 'true' || d(match[2]) === 'false') {
                        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                    }
                }

                window.params = params;
            })();
        </script>

        <script>
            var recordingDIV = document.querySelector('.recordrtc');
            var recordingMedia = "record-video";
            var recordingPlayer = recordingDIV.querySelector('video');
            var mediaContainerFormat = "WebM";
            alert(recordingMedia);
            recordingDIV.querySelector('button').onclick = function () {
                var button = this;

                if (button.innerHTML === 'Stop Recording') {
                    button.disabled = true;
                    button.disableStateWaiting = true;
                    setTimeout(function () {
                        button.disabled = false;
                        button.disableStateWaiting = false;
                    }, 2 * 1000);

                    button.innerHTML = 'Star Recording';

                    function stopStream() {
                        if (button.stream && button.stream.stop) {
                            button.stream.stop();
                            button.stream = null;
                        }
                    }

                    if (button.recordRTC) {
                        if (button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function (url) {
                                if (!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function (url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        } else {
                            button.recordRTC.stopRecording(function (url) {
                                button.recordingEndedCallback(url);
                                stopStream();

                                saveToDiskOrOpenNewTab(button.recordRTC);
                            });
                        }
                    }

                    return;
                }

                button.disabled = true;

                var commonConfig = {
                    onMediaCaptured: function (stream) {
                        button.stream = stream;
                        if (button.mediaCapturedCallback) {
                            button.mediaCapturedCallback();
                        }

                        button.innerHTML = 'Stop Recording';
                        button.disabled = false;
                    },
                    onMediaStopped: function () {
                        button.innerHTML = 'Start Recording';

                        if (!button.disableStateWaiting) {
                            button.disabled = false;
                        }
                    },
                    onMediaCapturingFailed: function (error) {
                        if (error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                            InstallTrigger.install({
                                'Foo': {
                                    // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                    URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                    toString: function () {
                                        return this.URL;
                                    }
                                }
                            });
                        }

                        commonConfig.onMediaStopped();
                    }
                };

                if (recordingMedia === 'record-video') {
                    captureVideo(commonConfig);

                    button.mediaCapturedCallback = function () {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: mediaContainerFormat === 'Gif' ? 'gif' : 'video',
                            disableLogs: params.disableLogs || false,
                            canvas: {
                                width: params.canvas_width || 320,
                                height: params.canvas_height || 240
                            },
                            frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                        });

                        button.recordingEndedCallback = function (url) {
                            recordingPlayer.src = null;
                            recordingPlayer.srcObject = null;

                            if (mediaContainerFormat === 'Gif') {
                                recordingPlayer.pause();
                                recordingPlayer.poster = url;

                                recordingPlayer.onended = function () {
                                    recordingPlayer.pause();
                                    recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                };
                                return;
                            }

                            recordingPlayer.src = url;
                            recordingPlayer.play();

                            recordingPlayer.onended = function () {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }





            };

            function captureVideo(config) {
                captureUserMedia({video: true}, function (videoStream) {
                    recordingPlayer.srcObject = videoStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(videoStream);

                    videoStream.onended = function () {
                        config.onMediaStopped();
                    };
                }, function (error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudio(config) {
                captureUserMedia({audio: true}, function (audioStream) {
                    recordingPlayer.srcObject = audioStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(audioStream);

                    audioStream.onended = function () {
                        config.onMediaStopped();
                    };
                }, function (error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudioPlusVideo(config) {
                captureUserMedia({video: true, audio: true}, function (audioVideoStream) {
                    recordingPlayer.srcObject = audioVideoStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(audioVideoStream);

                    audioVideoStream.onended = function () {
                        config.onMediaStopped();
                    };
                }, function (error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureScreen(config) {
                getScreenId(function (error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if (error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    captureUserMedia(screenConstraints, function (screenStream) {
                        recordingPlayer.srcObject = screenStream;
                        recordingPlayer.play();

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function () {
                            config.onMediaStopped();
                        };
                    }, function (error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureAudioPlusScreen(config) {
                getScreenId(function (error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if (error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    screenConstraints.audio = true;

                    captureUserMedia(screenConstraints, function (screenStream) {
                        recordingPlayer.srcObject = screenStream;
                        recordingPlayer.play();

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function () {
                            config.onMediaStopped();
                        };
                    }, function (error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
            }





            function saveToDiskOrOpenNewTab(recordRTC) {
                recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
                recordingDIV.querySelector('#save-to-disk').onclick = function () {
                    if (!recordRTC)
                        return alert('No recording found.');

                    recordRTC.save();
                };

                recordingDIV.querySelector('#open-new-tab').onclick = function () {
                    if (!recordRTC)
                        return alert('No recording found.');

                    window.open(recordRTC.toURL());
                };

                recordingDIV.querySelector('#upload-to-server').disabled = false;
                recordingDIV.querySelector('#upload-to-server').onclick = function () {
                    if (!recordRTC)
                        return alert('No recording found.');
                    this.disabled = true;

                    var button = this;
                    uploadToServer(recordRTC, function (progress, fileURL) {
                        if (progress === 'ended') {
                            button.disabled = false;
                            button.innerHTML = 'Click to download from server';
                            button.onclick = function () {
                                window.open(fileURL);
                            };
                            return;
                        }
                        button.innerHTML = progress;
                    });
                };
            }

            var listOfFilesUploaded = [];

            function uploadToServer(recordRTC, callback) {
                var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
                var fileType = blob.type.split('/')[0] || 'audio';
                var fileName = (Math.random() * 1000).toString().replace('.', '');

                if (fileType === 'audio') {
                    fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
                } else {
                    fileName += '.webm';
                }

                // create FormData
                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-blob', blob);

                callback('Uploading ' + fileType + ' recording to server.');

                makeXMLHttpRequest('?controller=gravacao&action=add', formData, function (progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }

                    var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/';

                    callback('ended', initialURL + fileName);

                    // to make sure we can delete as soon as visitor leaves
                    listOfFilesUploaded.push(initialURL + fileName);
                });
            }

            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        callback('upload-ended');
                    }
                };

                request.upload.onloadstart = function () {
                    callback('Upload started...');
                };

                request.upload.onprogress = function (event) {
                    callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                };

                request.upload.onload = function () {
                    callback('progress-about-to-end');
                };

                request.upload.onload = function () {
                    callback('progress-ended');
                };

                request.upload.onerror = function (error) {
                    callback('Failed to upload to server');
                    console.error('XMLHttpRequest failed', error);
                };

                request.upload.onabort = function (error) {
                    callback('Upload aborted.');
                    console.error('XMLHttpRequest aborted', error);
                };

                request.open('POST', url);
                request.send(data);
            }

            window.onbeforeunload = function () {
                recordingDIV.querySelector('button').disabled = false;
                recordingMedia.disabled = false;
                mediaContainerFormat.disabled = false;

                if (!listOfFilesUploaded.length)
                    return;

                listOfFilesUploaded.forEach(function (fileURL) {
                    var request = new XMLHttpRequest();
                    request.onreadystatechange = function () {
                        if (request.readyState == 4 && request.status == 200) {
                            if (this.responseText === ' problem deleting files.') {
                                alert('Failed to delete ' + fileURL + ' from the server.');
                                return;
                            }

                            listOfFilesUploaded = [];
                            alert('You can leave now. Your files are removed from the server.');
                        }
                    };
                    request.open('POST', 'delete.php');

                    var formData = new FormData();
                    formData.append('delete-file', fileURL.split('/').pop());
                    request.send(formData);
                });

                return 'Please wait few seconds before your recordings are deleted from the server.';
            };
        </script>
