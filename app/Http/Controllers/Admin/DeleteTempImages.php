<?php

namespace App\Http\Controllers\Admin;

use App\Mail\DeletedTempImagesMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DeleteTempImages extends Controller
{
    /**
     * Delete images in the temp folder which are older than a day.
     */
    public function __invoke()
    {
        $filesDeletedSuccessfully = 0;
        $filesFailedToDelete = 0;

        $dirname = storage_path('tmp/uploads/cars/');

        if (file_exists($dirname)) {
            $files = glob($dirname . '*.{jpeg,png,jpg}', GLOB_BRACE);

            try {
                foreach ($files as $file) {
                    if (is_file($file)) {
                        $last_modified = date("Y-n-j", filemtime($file));
                        $datetime1 = date_create($last_modified);

                        $now = date("Y-n-j");
                        $datetime2 = date_create($now);

                        $diff = date_diff($datetime1, $datetime2);

                        if ($diff->days > 1) {
                            if (unlink($file)) {
                                $filesDeletedSuccessfully += 1;
                            } else {
                                $filesFailedToDelete += 1;
                            }
                        }
                    }
                }

                $data = array(
                    'filesDeletedSuccessfully' => $filesDeletedSuccessfully,
                    'filesFailedToDelete' => $filesFailedToDelete,
                    'message' => "Success",
                );

                // send mail after operation is complete
                Mail::to('doe@gmail.com')->send(new DeletedTempImagesMail($data));
            } catch (\Throwable $th) {
                Log::error('ERROR! Unable to delete images. Message: ' . $th->getMessage());
            }
        }
    }
}
