<?php

/**
 *  NEW FEATURE #01: readonly class
 *
 */

trait UserName
{
    public string $userName;
}
readonly class User
{
    /**
     * public $password;
     * PHP Fatal error:  Readonly property User::$password must have type
     * must have define public string $password
     */

    /**
     * we can't also use this trait
     * use UserName
     * PHP Fatal error:  Readonly class User cannot use trait with a non-readonly property UserName
     */

    function __construct(public string $name = '', public string $email = '') {}
}
$user = new User('William', 'william@gmail.com');
/**
 * $user->name = 'hafizul'; 
 * PHP Fatal error:  Uncaught Error: Cannot modify readonly property
 */
var_dump($user);
/**
 * OUTPUT: 
 * object(User)#1 (2) {
 *  ["name"]=>
 *  string(7) "William"
 *  ["email"]=>
 *  string(17) "william@gmail.com"
 *}
 */

/**
 *  NEW FEATURE #02: Standalone true, false and null type
 *
 */
function resultCalculation(): int|float|null
{
    return 1;
    return 1.1;
    return null;
}

/**
 *  NEW FEATURE #02: Hide sensitive information in the Back Trace 
 *
 */
class UserAcount
{
    public function  __construct(
        public string $user,
        #[\SensitiveParameter]
        public string $password
    ) {
        // throw new \Exception('Error');
    }
}
new UserAcount('william', 'password');

/**
 *  NEW FEATURE #03: Allow Constants in trait
 *
 */

trait UserType
{
    public const ADMIN = 'admin';
    public string $userType;
    function isAdmin(): bool
    {
        return $this->userType === self::ADMIN;
    }
}

class GitUser
{
    use UserType;
}
$user = new GitUser("admin");
$user->userType = "admin";

var_dump($user->isAdmin());


/**
 *  NEW FEATURE #03: Deprecate Dynamic Property Declaration
 *
 */

$user->lastName = 'Shakespeare';
var_dump($user);
