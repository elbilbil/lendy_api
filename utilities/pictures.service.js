const conf = require('../conf.js');
const path = require('path');
const base64Img = require('base64-img');
const fs = require('fs');
const _ = require('lodash');

class PicturesService {
    constructor() {
    }

    saveAds(ads, objType) {
        return new Promise((resolve, reject) => {
            let adsp = [];
            if (!ads)
                resolve();
            else {
                for (let i = 0; i < ads.length; i++) {
                    let ad = ads[i].pictures;
                    adsp.push(this.savePictures(ad, objType))
                }
                Promise.all(adsp)
                    .then(currentAds => {
                        for (let index = 0; index < currentAds.length; index++) {
                            ads.pictures = currentAds[index]
                        }
                        resolve(ads)
                    })
                    .catch((error) => {
                        reject(error)
                    })
            }
        })
    }

    savePictures(pictures, objType) {
        return new Promise((resolve, reject) => {
            let pictp = [];
            if (!pictures)
                resolve();
            else {
                for (let j = 0; j < pictures.length; j++) {
                    if (!pictures[j])
                        resolve();
                    if (pictures[j].filename) {
                        pictp.push(this.savePicture(pictures[j], objType))
                    }
                }
                Promise.all(pictp)
                    .then(currentPict => {
                        resolve(currentPict)
                    })
                    .catch((error) => {
                        reject(error)
                    })
            }
        })
    }

    savePicture(picture, objType) {
        objType = objType || "";
        let type = picture.type || objType || "other";
        let _path = this.getPath(objType);
        return new Promise((resolve, reject) => {
            if ((!picture && !picture.filename)) {
                resolve()
            }
            else {
                if (this.isBase64(picture.filename)) {
                    let filename = type + '-' + new Date().getTime();
                    base64Img.img(picture.filename, _path, filename, function (err, filepath) {
                        if (err)
                            reject(err);
                        else {
                            picture.title = picture.title,
                                picture.filename = filepath.split('/').pop(),
                                picture.type = picture.type;

                            resolve(picture)
                        }
                    })
                } else {
                    resolve("No base64")
                }
            }
        })
    }

    isBase64(str) {
        str = str.substring(str.indexOf(",") + 1);
        let base64regex = /^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$/;
        return base64regex.test(str)
        // try {
        //     return btoa(atob(str)) == str;
        // } catch (err) {
        //     return false;
        // }
    }

    removeFiles(files, type) {
        return new Promise((resolve, reject) => {
            let promises = [];
            for (let index = 0; index < files.length; index++) {
                const element = files[index];
                promises.push(this.removeFile(element, type))
            }
            Promise.all(promises)
                .then(files => {
                    resolve()
                }, err => {
                    reject(err)
                })
        })
    }


    removeFile(file, type) {
        return new Promise((resolve, reject) => {
            let _path = this.getPath(type) + "/" + file;
            fs.unlink(_path, (err) => {
                if (err) {
                    resolve(err)
                }
                resolve()
            });
        })
    }

    getPath(type) {
        let _path;

        if (type)
            _path = path.join(__dirname, './static/images/' + type);
        else
            _path = path.join(__dirname, './static/images/');

        return _path
    }

}

module.exports = new PicturesService();