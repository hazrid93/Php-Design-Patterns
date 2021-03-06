<?php
declare(strict_types=1);
namespace Azad\Pattern\Mediator;

class UserRepositoryUiMediator implements Mediator{
    private $userRepository;
    private $ui;

    public function __construct(UserRepository $userRepository, Ui $ui){
        $this->userRepository = $userRepository;
        $this->ui = $ui;
        $this->userRepository->setMediator($this);
        $this->ui->setMediator($this);
    }
    
    public function printInfoAbout(string $user)
    {
        $this->ui->outputUserInfo($user);
    }

    public function getUser(string $username): string
    {
        return $this->userRepository->getUserName($username);
    }
}
?>