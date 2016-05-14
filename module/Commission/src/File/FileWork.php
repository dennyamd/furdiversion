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
        $filename = $data['tmp_name'];
        $type = $data['type'];
        $dir = "./data/character_refs/";
        if (preg_match("/image\//", $type))
        {
            $extension = preg_replace('/image\//', '', $type);
            $destination = $dir . $id . '.' . $extension;
            return rename($filename, $destination);
        }
        else return false;  //not an image
    }
}
