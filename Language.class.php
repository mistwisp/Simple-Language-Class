<?php
    define( 'LANG_DIR', __DIR__ . '/lang/' );
    class Language
    {
        private $Languages = [];
        function __construct()
        {
            foreach( glob( LANG_DIR . '*.json' ) as $File ) 
            {
                $FileName = basename( $File, '.json' );
                $this->Languages[ $FileName ] = json_decode( file_get_contents( $File ), true );
            }
        }
        public function LanguageText( string $Lang, string $Key ): string
        {
            return $this->Languages[ $Lang ][ $Key ];
        }
        public function GetAllLanguages(): array
        {
            return array_keys( $this->Languages );
        }
    }
?>