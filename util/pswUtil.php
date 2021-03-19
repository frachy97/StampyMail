<?php
namespace util;
    /**
     * Simple Password Class
     *
     * Password Hashing and Verify Class for PHP 5.5.0+
     * @author diafol
     * @version 1.0
     */
    class PswUtil
    {
        /**
         *  Algorithm constant - ensure that your DB field is large
         *  enough for any hash that you produce. BCRYPT requires 
         *  60 characters 
         */
        const ALGO = PASSWORD_BCRYPT;
        /**
         *  The 'cost' is a function of the time taken to process 
         *  @var int
         */
        private $cost = 11;
        /**
         *  The minimum number of characters allowed in the raw password 
         *  @var int
         */
        private $minLength = 8;
        /**
         *  The maximum number of characters allowed in the raw password 
         *  @var int
         */
        private $maxLength = 60;
        /**
         *  The minimum ASCII decimal value allowed in the raw password 
         *  @var int
         */
        private $minASCII = 33;
        /**
         *  The maximum ASCII decimal value allowed in the raw password 
         *  @var int
         */
        private $maxASCII = 126;
        /**
         * check whether any characters exist in the password outside the
         * allowed ASCII range
         * @param string $password the raw password
         * @return bool
         */
        private function preg_check($password)
        {
            $start = dechex($this->minASCII);
            $end = dechex($this->maxASCII);
            return (preg_match("/[^\x$start-\x$end]/", $password)) ? false : true;		
        }
        /**
         * check whether the number of characters within the raw password 
         * satisfy the range and also run the preg_check() method
         * @param string $password the raw password
         * @return boolean
         */
        public function validate($password)
        {
            $passLength = strlen($password);
            return ( $this->preg_check($password) && $passLength >= $this->minLength && $passLength <= $this->maxLength )
                ? true : false;
        }
        /**
         * produce a hash from a supplied raw password
         * @param string $password the raw password
         * @return string|false false if hash cannot be produced
         */
        public function hash($password)
        {
            return password_hash($password, self::ALGO, array('cost'=>$this->cost));
        }
        /**
         * compare the supplied password with a hash
         * @param string $password the raw password
         * @param string $hash the supplied hash value
         * @return bool
         */
        public function compare($password, $hash)
        {
            return password_verify($password, $hash);	
        }	
    }
        
?>