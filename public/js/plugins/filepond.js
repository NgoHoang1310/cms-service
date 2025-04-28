$(function () {
    // Đăng ký các plugin FilePond
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginImageEdit
    );

    // Cấu hình mặc định cho tất cả FilePond
    const defaultConfigs = {
        instantUpload: false,
        labelIdle: 'Kéo & Thả tệp của bạn hoặc <span class="filepond--label-action">Chọn tệp</span>',
        imageEditorEdit: true,
        allowImagePreview: true,
        allowRevert: true,
        credits: false,
        allowMultiple: false,
        labelFileTypeNotAllowed: 'Định dạng không hợp lệ',
    };

    // Headers CSRF mặc định
    const csrfHeaders = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    };

    // Hàm tạo FilePond với cấu hình tùy chỉnh
    function createFilePond(inputElement, customConfig = {}) {
        if (!inputElement) return null;

        try {
            return FilePond.create(inputElement, {
                ...defaultConfigs, ...customConfig
            });
        } catch (e) {
            console.error(`Lỗi khởi tạo FilePond cho ${inputElement.id}:`, e);
            return null;
        }
    }

    // Hàm xử lý file hiện có
    function getExistingFileConfig(input) {
        const existingUrl = input.dataset.url;
        const existingPath = input.dataset.path;

        return existingUrl ? [{
            source: '/proxy?url=' + encodeURIComponent(existingUrl), options: {
                type: 'local', metadata: {
                    id: existingPath,
                }
            }
        }] : [];
    }

    // Xử lý avatar
    const avatarInput = document.querySelector('#avatar_link.filepond');
    if (avatarInput) {
        const avatarPond = createFilePond(avatarInput, {
            files: getExistingFileConfig(avatarInput),
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            server: {
                process: {
                    url: '/upload?path=avatars', // Đường dẫn đến server xử lý upload
                    method: 'POST',
                    headers: csrfHeaders,
                    onload: (response) => {
                        const result = JSON.parse(response);
                        $('input[name="avatar_link"]').val(result.id);
                        return response;
                    }
                },
                revert: {
                    url: '/upload/revert',
                    method: 'DELETE',
                    headers: csrfHeaders,
                    onload: () => {
                        $('input[name="avatar_link"]').val('');
                    }
                },
                load: (source, load, error) => {
                    fetch(source)
                        .then(res => {
                            if (!res.ok) {
                                throw new Error(`HTTP status ${res.status}`);
                            }
                            return res.blob();
                        })
                        .then(load)
                        .catch(() => {
                            error('File not found');
                        });
                },
            },
        });

        if (avatarPond) {
            avatarPond.on('removefile', (error, file) => {
                const existingImage = avatarInput.dataset.url;
                if (!existingImage) return;

                const fileId = file.getMetadata('id');
                if (fileId) {
                    fetch('/upload/revert', {
                        method: 'DELETE', headers: {
                            'Content-Type': 'application/json', ...csrfHeaders
                        }, body: JSON.stringify({id: fileId})
                    }).then(() => {
                        $('input[name="avatar_link"]').val('');
                    }).catch(console.error);
                }
            });
        }
    }

    // Xử lý backdrop
    const backdropInput = document.querySelector('#backdrop_url.filepond');
    if (backdropInput) {
        const backdropPond = createFilePond(backdropInput, {
            files: getExistingFileConfig(backdropInput),
            imageCropAspectRatio: '16:9',
            server: {
                process: {
                    url: '/upload?path=backdrops', // Đường dẫn đến server xử lý upload
                    method: 'POST',
                    headers: csrfHeaders,
                    onload: (response) => {
                        const result = JSON.parse(response);
                        $('input[name="backdrop_url"]').val(result.id);
                        return response;
                    }
                },
                revert: {
                    url: '/upload/revert',
                    method: 'DELETE',
                    headers: csrfHeaders,
                    onload: () => {
                        $('input[name="backdrop_url"]').val('');
                    }
                },
                load: (source, load, error) => {
                    fetch(source)
                        .then(res => {
                            if (!res.ok) {
                                throw new Error(`HTTP status ${res.status}`);
                            }
                            return res.blob();
                        })
                        .then(load)
                        .catch(() => {
                            error('File not found');
                        });
                },
            }
        });

        if (backdropPond) {
            backdropPond.on('removefile', (error, file) => {
                const existingImage = backdropInput.dataset.url;
                if (!existingImage) return;

                const fileId = file.getMetadata('id');
                if (fileId) {
                    fetch('/upload/revert', {
                        method: 'DELETE', headers: {
                            'Content-Type': 'application/json', ...csrfHeaders
                        }, body: JSON.stringify({id: fileId})
                    }).then(() => {
                        $('input[name="backdrop_url"]').val('');
                    }).catch(console.error);
                }
            });
        }
    }

    // Xử lý poster
    const posterInput = document.querySelector('#poster_url.filepond');
    if (posterInput) {
        const posterPond = createFilePond(posterInput, {
            files: getExistingFileConfig(posterInput),
            imageCropAspectRatio: '2:3',
            server: {
                process: {
                    url: '/upload?path=posters', // Đường dẫn đến server xử lý upload
                    method: 'POST',
                    headers: csrfHeaders,
                    onload: (response) => {
                        const result = JSON.parse(response);
                        $('input[name="poster_url"]').val(result.id);
                        return response;
                    }
                },
                revert: {
                    url: '/upload/revert',
                    method: 'DELETE',
                    headers: csrfHeaders,
                    onload: () => {
                        $('input[name="poster_url"]').val('');
                    }
                },
                load: (source, load, error) => {
                    fetch(source)
                        .then(res => {
                            if (!res.ok) {
                                throw new Error(`HTTP status ${res.status}`);
                            }
                            return res.blob();
                        })
                        .then(load)
                        .catch(() => {
                            error('File not found');
                        });
                },
            }
        });

        if (posterPond) {
            posterPond.on('removefile', (error, file) => {
                const existingImage = posterInput.dataset.url;
                if (!existingImage) return;

                const fileId = file.getMetadata('id');
                if (fileId) {
                    fetch('/upload/revert', {
                        method: 'DELETE', headers: {
                            'Content-Type': 'application/json', ...csrfHeaders
                        }, body: JSON.stringify({id: fileId})
                    }).then(() => {
                        $('input[name="poster_url"]').val('');
                    }).catch(console.error);
                }
            });
        }
    }

    // Xử lý poster
    const videoInput = document.querySelector('#video.filepond');
    if (videoInput) {
        const videoPond = createFilePond(videoInput, {
            files: getExistingFileConfig(videoInput),
            server: {
                process: {
                    url: '/upload/temp?path=videos', // Đường dẫn đến server xử lý upload
                    method: 'POST',
                    headers: csrfHeaders,
                    onload: (response) => {
                        const result = JSON.parse(response);
                        $('input[name="temp_path"]').val(result.temp_path);
                        return JSON.stringify({
                            id: result.temp_path
                        })
                    }
                },
                revert: {
                    url: '/upload/temp/revert',
                    method: 'DELETE',
                    headers: csrfHeaders,
                },
                load: (source, load, error) => {
                    fetch(source)
                        .then(res => {
                            if (!res.ok) {
                                throw new Error(`HTTP status ${res.status}`);
                            }
                            return res.blob();
                        })
                        .then(load)
                        .catch(() => {
                            error('File not found');
                        });
                },
            }
        });

        if (videoPond) {
            videoPond.on('removefile', (error, file) => {
                const existingImage = videoInput.dataset.url;
                if (!existingImage) return;

                const fileId = file.getMetadata('id');
                if (fileId) {
                    fetch('/upload/temp/revert', {
                        method: 'DELETE', headers: {
                            'Content-Type': 'application/json', ...csrfHeaders
                        }, body: JSON.stringify({id: fileId})
                    })
                        .catch(console.error);
                }
            });
        }
    }
});
