<?php
final class AbsCaptcha
{
   private function __clone()
   {
   }

   # PRIVATE PROPERTIES
   #==================================

   private $sess_name = 'X_CAPTCHA_CODE', # The name of the session variable that will hold the captcha's generated code
      $save_dir = 'captcha', # The path to the directory where to store the created captchas(temporary)
      $image_name = 'code_img', # The name of the captcha image
      $width = 100, # The width, in pixels, of the captcha image
      $height = 50, # The height, in pixels, of the captcha image
      $code_length = 6, # The number of digits and letters to display in the captcha image
      $bgColor = array( 0, 0, 0 ), # The background color of the captcha image. (r,g,b)
      $fgColor = array( 255, 255, 0 ); # The image's text color. (r,g,b)

   # PUBLIC METHODS
   #==================================

   /**
    * Constructor
    *
    * @param string $captcha_session_name  The name of the session variable that will hold the captcha's generated code. It's important not to use the default assigned name!
    * @param string $save_dir  The path to the directory where to store the created images.
    * @param string $image_name  The name of the image. The image's extension is not required.
    * @param array $image_bg_color  The image's background color.
    * @param array $image_fg_color  The image's text color.
    * @param string $code_length  The number of digits and letters to display in the image.
    * @param string $width  The width, in pixels, of the captcha image.
    * @param string $height  The height, in pixels, of the captcha image.
    */
   public function __construct( $captcha_session_name = '', $save_dir = '', $image_name = '', $image_bg_color = array(), $image_fg_color = array(), $code_length = null, $width = null, $height = null )
   {
      // GD Library is a MUST !
      if ( !extension_loaded( 'gd' ) or !function_exists( 'gd_info' ) )
         exit( 'The ' . __class__ . ' class requires the GD Library to be able to generate the captcha images!' );

      $this->SetSessionName( $captcha_session_name );
      $this->SetDirectory( $save_dir );
      $this->SetImageName( $image_name );
      $this->SetImageBgColor( $image_bg_color );
      $this->SetImageFgColor( $image_fg_color );
      $this->SetCodeLength( $code_length );
      $this->SetImageWidth( $width );
      $this->SetImageHeight( $height );
   }

   /**
    * Create the captcha image.
    * @return boolean
    */
   public function GenerateCaptcha()
   {
      // update: Fri Apr 24, 2009
      // Makes no sense to generate the image before checking for if the session has been started. (my bad)
      // If the session hasn't been started, the captcha won't work.
      if ( !isset( $_SESSION ) )
         exit( 'Error: The session was not started! The ' . __class__ . ' class requires a session to be started in order to function properly!' );

      // Create the captcha image
      $captcha = $this->_create_captcha( $this->save_dir, $this->image_name, $this->bgColor, $this->width, $this->height );

      // Set the background color for lines
      $line1 = @imagecolorallocate( $captcha, 233, 239, 239 );
      $line2 = @imagecolorallocate( $captcha, 125, 255, 033 );
      $line3 = @imagecolorallocate( $captcha, 105, 155, 200 );
      $line4 = @imagecolorallocate( $captcha, 200, 30, 120 );
      $line_yellow = @imagecolorallocate( $captcha, 255, 255, 0 );
      $line_gray = @imagecolorallocate( $captcha, 128, 128, 128 );
      $forecolor = @imagecolorallocate( $captcha, $this->fgColor[0], $this->fgColor[1], $this->fgColor[2] );

      // Draw some lines.
      @imageline( $captcha, 0, 0, 104, 129, $line1 );
      @imageline( $captcha, 10, 0, 164, 129, $line1 );
      @imageline( $captcha, 50, 0, 9, 139, $line2 );
      @imageline( $captcha, 70, 130, 32, 32, $line3 );
      @imageline( $captcha, 80, 0, 52, 52, $line4 );
      @imageline( $captcha, 90, 0, 72, 72, $line3 );
      @imageline( $captcha, 84, 20, 12, 72, $line_gray );
      @imageline( $captcha, 84, 22, 13, 73, $line_gray );
      @imageline( $captcha, 30, 0, 120, 72, $line1 );
      @imageline( $captcha, 100, 122, 130, 73, $line_gray );

      // Generate a random string
      $code = md5( uniqid( rand(), true ) );
      // cut string to the length of the digits set to be displayed in the image
      $string = strtoupper( substr( $code, 0, $this->GetCodeLength() ) );

      // Write the string into the image
      @imagestring( $captcha, 7, 25, 17, $string, $forecolor );

      // Save the new image
      @imagepng( $captcha, $this->save_dir . $this->image_name, 9, PNG_ALL_FILTERS );

      // Store the code in the SESSION
      //if (isset($_SESSION)) $_SESSION[$this->sess_name] = $string;
      //exit('Error: The session was not started! The '.__CLASS__.' class requires a session to be started in order to function properly!');

      // Store the code in the SESSION
      $_SESSION[$this->sess_name] = $string;

      return true;
   }

   # ACCESSOR/MUTATOR METHODS
   #==================================

   /**
    * Set the the name of the session variable that will hold the generated code
    *
    * @param string $sess_name  The name of the session variable that will hold the captcha's generated code
    * @return void
    */
   public function SetSessionName( $sess_name = '' )
   {
      if ( ( strlen( trim( $sess_name ) ) > 0 ) and !isset( $_SESSION[$sess_name] ) )
         $this->sess_name = $sess_name;
   }

   /**
    * Get the the name of the session variable that holds the generated code
    * @return string
    */
   public function GetSessionName()
   {
      return $this->sess_name;
   }

   /**
    * Set the background color of the image
    *
    * @param array $image_bg_color  The list of colors(r,g,b) to use to fill the image
    * @return void
    */
   public function SetImageBgColor( $image_bg_color = array() )
   {
      if ( count( $image_bg_color ) < 1 )
         return;

      if ( isset( $image_bg_color[0] ) and $image_bg_color[0] >= 0 )
         $this->bgColor[0] = $image_bg_color[0];
      if ( isset( $image_bg_color[1] ) and $image_bg_color[1] >= 0 )
         $this->bgColor[1] = $image_bg_color[1];
      if ( isset( $image_bg_color[2] ) and $image_bg_color[2] >= 0 )
         $this->bgColor[2] = $image_bg_color[2];
   }

   /**
    * Set the color of the text that will be displayed in the image
    *
    * @param array $image_fg_color  The list of colors(r,g,b) to use for the text
    * @return void
    */
   public function SetImageFgColor( $image_fg_color = array() )
   {
      if ( count( $image_fg_color ) < 1 )
         return;

      if ( isset( $image_fg_color[0] ) and $image_fg_color[0] >= 0 )
         $this->fgColor[0] = $image_fg_color[0];
      if ( isset( $image_fg_color[1] ) and $image_fg_color[1] >= 0 )
         $this->fgColor[1] = $image_fg_color[1];
      if ( isset( $image_fg_color[2] ) and $image_fg_color[2] >= 0 )
         $this->fgColor[2] = $image_fg_color[2];
   }

   /**
    * Set the image's code length
    *
    * @param string $length  The number of digits and letters to display in the captcha image 
    * @return void
    */
   public function SetCodeLength( $length )
   {
      if ( !is_null( $length ) and $length > 0 )
         $this->code_length = $length;
   }

   /**
    * Get the image's code length
    * @return number
    */
   public function GetCodeLength()
   {
      return $this->code_length;
   }

   /**
    * Set the path to the directory where to save the captcha images
    *
    * @param string $save_dir  The path to the directory where to store the created captchas(temporary)
    * @return void
    */
   public function SetDirectory( $save_dir = '' )
   {
      if ( !empty( $save_dir ) ) {
         if ( is_dir( $save_dir ) )
            $this->save_dir = $save_dir;
         else {
            if ( @mkdir( $save_dir ) ) // try to create the directory

               $this->save_dir = $save_dir;
            else
               exit( 'Error: The directory where to store the generated captchas could not be found nor created. Please create it manually!' );
         }
      }
   }

   /**
    * Get the path to the directory where to save the captcha image
    * @return string
    */
   public function GetDirectory()
   {
      return $this->save_dir;
   }

   /**
    * Get the captcha's code stored in the session
    * @return string
    */
   public function GetCaptchaCode()
   {
      $code = 0;
      if ( isset( $_SESSION ) and isset( $_SESSION[$this->sess_name] ) )
         $code = $_SESSION[$this->sess_name];
      return $code;
   }

   /**
    * Set the the name and extension of the image
    *
    * @param string $image_name  The name of the captcha image
    * @return void
    */
   public function SetImageName( $image_name = '' )
   {
      if ( strlen( trim( $image_name ) ) > 0 )
         $this->image_name = $image_name . '.png';
      else
         $this->image_name .= '.png';
   }

   /**
    * Get the the name and extension of the image
    * @return string
    */
   public function GetImageName()
   {
      return $this->image_name;
   }

   /**
    * Set the width of the image
    *
    * @param string $width  In pixels, the width of the captcha image
    * @return void
    */
   public function SetImageWidth( $width )
   {
      if ( !is_null( $width ) and $width > 0 )
         $this->width = $width;
   }

   /**
    * Get the width of the image
    * @return number
    */
   public function GetImageWidth()
   {
      return $this->width;
   }

   /**
    * Set the the height of the image
    *
    * @param string $height  In pixels, the height of the captcha image
    * @return void
    */
   public function SetImageHeight( $height )
   {
      if ( !is_null( $height ) and $height > 0 )
         $this->height = $height;
   }

   /**
    * Get the the height of the image
    * @return number
    */
   public function GetImageHeight()
   {
      return $this->height;
   }

   # PRIVATE (INTERNAL) METHODS
   #==================================

   /**
    * Convenient function to create the background support image for captchas
    * @access: internal
    * @return resource  An empty image
    */
   private function _create_captcha( $save_dir, $image_name, array $bgColor, $width, $height )
   {
      // Create image
      $image = @imagecreatetruecolor( $width, $height );

      // Set background color
      $color_background = @imagecolorallocate( $image, $bgColor[0], $bgColor[1], $bgColor[2] );

      // Fill the image
      @imagefill( $image, 0, 0, $color_background );

      return $image;
   }
}


?>