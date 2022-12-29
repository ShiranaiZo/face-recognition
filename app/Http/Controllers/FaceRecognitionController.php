<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class FaceRecognitionController extends Controller
{
    public function rekamDataWajah()
    {
        $uniqid = uniqid();
        $path = public_path();
        $process = new Process("python ".public_path()."/face_recognition/face_dataset.py ".$path. ' '. $uniqid);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json($process->getOutput());
    }

    public function trainingData()
    {
        $path = public_path();
        $process = new Process("python ".public_path()."/face_recognition/face_training.py ".$path);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Hapus Data sementara
        $all_files = File::allFiles('face_recognition/datasementara/');
        File::Delete($all_files);

        return response()->json($process->getOutput());
    }
}
