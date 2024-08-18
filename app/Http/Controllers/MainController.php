<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function getValidationErrorMessage($validationErrors): string
    {
        $errorMessage = '';
        foreach ($validationErrors as $validationInputErrorMessages) {
            $errorMessage .= implode(' ', $validationInputErrorMessages);
        }
        return $errorMessage;
    }

    public function getInvalidInputErrorResponse($exception, $path)
    {
        $errorMessages = $this->getValidationErrorMessage($exception->validator->errors()->getMessages());
        return [
            'error' => 'Invalid Input',
            'message' => $errorMessages,
            'status' => 401,
            'path' => $path,
        ];
    }

    public function getNotFoundErrorResponse($message, $path)
    {
        return [
            'error' => 'Not Found',
            'message' => $message,
            'status' => 404,
            'path' => $path,
        ];
    }

    public function getServerErrorResponse($exception, $path)
    {
        return [
            'error' => 'Server Error',
            'message' => $exception->getMessage(),
            'status' => 500,
            'path' => $path,
        ];
    }

}
