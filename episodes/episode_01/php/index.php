<?php

interface Upload {
    public function upload();
}

class AWSUploader implements Upload {

    public function upload() {
        //... here implementaion for AWS upload process
        echo 'I upload file to AWS'. PHP_EOL;
    }

}

class LocalUploader implements Upload {

    public function upload() {
        //... here you can implement local upload
        echo 'I upload file to local storage'. PHP_EOL;
    }

}

class Uploader implements Upload{

    private $uploadMethod;

    public function __construct(Upload $uploadMethod) {
        $this->uploadMethod = $uploadMethod;
    }

    public function setUploadMethod(Upload $uploadMethod){
        $this->uploadMethod = $uploadMethod;
    }

    public function upload() {
        $this->uploadMethod->upload();
    }
}



$uploader = new Uploader(new AWSUploader());
$uploader->upload();

$uploader->setUploadMethod(new LocalUploader());
$uploader->upload();