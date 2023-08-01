<?php

namespace App\Actions\UserSubscription;

use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadAvatar
{
    /**
     * @throws \Throwable
     */
    public function handle(UserSubscription $userSubscription, Request $request): bool
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            //upload file to S3
            $fileContent = file_get_contents($file->getRealPath());

            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $timestamp = time();
            $randomNumber = rand(1, 10000);
            $filename = $timestamp . '_' . $randomNumber . '.' . $extension;

            Storage::disk('s3')->put($filename, $fileContent);

            //save filename to usersubscription talbe

            return true;
        } else {
            return false;
        }
    }
}
