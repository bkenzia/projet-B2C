<?php
namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserCommand extends Command
{
    private $entityManagerInterface;
    private $encoder;
    protected static $defaultName = 'app:creat-user';

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserPasswordHasherInterface $encoder
    ) {
        $this->entityManagerInterface=$entityManagerInterface;
        $this->encoder=$encoder;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('username', InputArgument::REQUIRED, 'The username of the new user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the new user')
            // ->addArgument('email', InputArgument::OPTIONAL, 'The email of the new user')
            // ->addArgument('full-name', InputArgument::OPTIONAL, 'The full name of the new user')
            // ->addOption('admin', null, InputOption::VALUE_NONE, 'If set, the user is created as an administrator')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       

        // create the user and hash its password
        $user = new User();
        $user->setEmail($input->getArgument('username'));

        // See https://symfony.com/doc/5.4/security.html#registering-the-user-hashing-passwords
        $hashedPassword = $this->encoder->hashPassword($user, $input->getArgument('password'));
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_ADMIN'])
            ->setPrenom('')
            ->setNom('')
            ->setTelephone('');
         
        $this->entityManagerInterface->persist($user);
        $this->entityManagerInterface->flush();

        
        return Command::SUCCESS;
    }
}
