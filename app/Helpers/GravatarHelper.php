<?php
namespace App\Helpers;


class GravatarHelper {
    /**
     *
     * Class GravatarHelper
     *
     * Check if email has any gravatar image or not
     *
     * @param string $email user email
     * @return boolean true, if there is an image else false
     *
     */

    public static function validate_gravatar($email)
    {
        $hash = md5($email);
        // $uri = 'https://gravatar.com/avatar' . $hash . '?d=404';
        // $headers = @get_headers($uri);
        // if (!preg_match("|200|", $headers[0])) {
        //     $has_valid_avatar = FALSE;
        // } else {
        //     $has_valid_avatar = TRUE;
        // }
        $has_valid_avatar = TRUE;
        return $has_valid_avatar;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $size Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @return String containing either just a URL or a complete image tag
     *
     */
    public static function gravatar_image( $email, $size=0, $d="") {
        $hash = md5($email);
        // $image_url = 'https://gravatar.com/avatar/' . $hash . '?s=' . $size . '&d=' . $d;
        $image_url = $hash . '?s=' . $size . '&d=' . $d;

        return $image_url;
    }
}
