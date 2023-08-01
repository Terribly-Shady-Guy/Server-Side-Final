<?php

require_once "admin_model_interface.php";

class User implements AdminModelInterface
{
    private $userKey;
    private $username;
    private $password;
    private $accountType;
    private $firstName;
    private $lastName;
    private $email;

    public function __construct($userData)
    {
        $this->userKey = $userData['UserKey'];
        $this->username = $userData['Username'];
        $this->password = $userData['UserPassword'];
        $this->accountType = $userData['AccountType'];
        $this->firstName = $userData['UserFirstName'];
        $this->lastName = $userData['UserLastName'];
        $this->email = $userData['UserEmail'];
    }

    public function createRow()
    {
        $userKey = htmlspecialchars($this->userKey);
        $username = htmlspecialchars($this->username);
        $password = htmlspecialchars($this->password);
        $accountType = htmlspecialchars($this->accountType);
        $userFirstName = htmlspecialchars($this->firstName);
        $userLastName = htmlspecialchars($this->lastName);
        $userEmail = htmlspecialchars($this->email);

        return <<<_END
        <tr>
            <td>$userKey</td>
            <td>$username</td>
            <td>$password</td>
            <td>$accountType</td>
            <td>$userFirstName</td>
            <td>$userLastName</td>
            <td>$userEmail</td>
            <td>
                <form method="post" action="src/admin/delete_user.php">
                    <input type="submit" name="deleteUser" value="Delete">
                    <input type="hidden" name="UserKey" value="$userKey">
                </form>
            </td>
        </tr>
        _END;
    }
}

?>