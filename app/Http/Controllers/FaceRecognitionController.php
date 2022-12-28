<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;

class FaceRecognitionController extends Controller
{
    public function rekamDataWajah()
    {
        $uniqid = uniqid();
        $text = public_path();
        $process = new Process("python ".public_path()."/face_recognition/face_dataset.py ".$text. ' '. $uniqid);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json($process->getOutput());
    }
}
