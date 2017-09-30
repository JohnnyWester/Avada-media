<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class MoviesUpload extends Model {
    public $movie;

    public function rules()
    {
        return [
            ['movie', 'required'],
            [['movie'], 'file', 'extensions' => 'mp4, ogg,webm'],
        ];
    }

    public function uploadFile(UploadedFile $fileMovie) {
        $this->movie = $fileMovie;
        return $this->saveMovie();
    }

    public function updateMovie(UploadedFile $fileMovie, $currentMovie) {
        $this->movie = $fileMovie;
        $this->deleteCurrentMovie($currentMovie);
        return $this->saveMovie();
    }

    public function getFolder() {
        return Yii::getAlias('@web') . 'movies/';
    }

    public function generateFilename() {
        return strtolower(md5(uniqid($this->movie->baseName)) . '.' . $this->movie->extension);
    }

    public function deleteCurrentMovie ($currentMovie) {
        if ($this->fileExist($currentMovie)) {
            unlink($this->getFolder() . $currentMovie);
        }
    }

    public function fileExist ($currentMovie) {
        if(!empty($currentMovie) && $currentMovie != null) {
            return file_exists($this->getFolder() . $currentMovie);
        }
    }

    public function saveMovie() {

        $filename = $this->generateFilename();
        $this->movie->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}