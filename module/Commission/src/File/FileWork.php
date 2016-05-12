<?php
namespace Commission\File;

class FileWork
{

    /**
     * moves temp file to final destination, renamed
     *
     * @param int $id
     * @param array $data
     * @return boolean
     */
    function saveFile($id, array $data)
    {
        // save the file
        if ($data === null)
            return; // nothing to do

        $filename = $data['tmp_name'];
        $type = $data['type'];
        $dir = "./data/character_refs/";
        $extension = preg_replace('/image\//', '', $type);
        $destination = $dir . $id . '.' . $extension;

        return rename($filename, $destination);
    }
}


