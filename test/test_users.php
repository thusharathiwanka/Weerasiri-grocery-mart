<?php
   use PHPUnit\Framework\TestCase;
   class UserTest extends TestCase {
      /** 
       * @test 
      */
      public function userEmailValidation() {
         $validEmail = "test@gmail.com";
         $invalidEmail = "test@gmail";

         $isEmailValid = filter_var($validEmail, FILTER_VALIDATE_EMAIL);
         
         $this->assertEquals($validEmail, $isEmailValid);
         $this->assertFalse(filter_var($invalidEmail, FILTER_VALIDATE_EMAIL));
      }

      /** 
       * @test 
      */
      public function userNameValidation() {
         $validName = "Test";
         $invalidName = "Test01";

         $isNameValid = preg_match("/^[a-zA-Z ]*$/", $validName);
         $isNameInvalid = preg_match("/^[a-zA-Z ]*$/", $invalidName);
         
         $this->assertEquals(1, $isNameValid);
         $this->assertEquals(0, $isNameInvalid);
      }

      /** 
       * @test 
      */
      public function userMobileValidation() {
         $validMobile = "0777777777";
         $invalidMobile1 = "0777777";
         $invalidMobile2 = "0777777M";
         $isMobileValid1 = false;
         $isMobileValid2 = true;
         $isMobileValid3 = true;


         if(preg_match("/^[0-9]*$/", $validMobile) || strlen($validMobile) == 10) {
            $isMobileValid1 = true;
         }
         
         if(!preg_match("/^[0-9]*$/", $invalidMobile1) || strlen($invalidMobile1) != 10) {
            $isMobileValid2 = false;
         }

         if(!preg_match("/^[0-9]*$/", $invalidMobile2) || strlen($invalidMobile2) != 10) {
            $isMobileValid3= false;
         }   

         $this->assertTrue($isMobileValid1);
         $this->assertFalse($isMobileValid2);
         $this->assertFalse($isMobileValid3);
      }
   } 
?>