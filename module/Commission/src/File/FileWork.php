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
        $filename = $data['tmp_name'];
        $type = $data['type'];
        $dir = "./data/character_refs/";
        $extension = preg_replace('/image\//', '', $type);
        $destination = $dir . $id . '.' . $extension;

        return rename($filename, $destination);
    }
}


