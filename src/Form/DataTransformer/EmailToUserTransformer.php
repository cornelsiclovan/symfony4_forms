<?php

namespace App\Form\DataTransformer;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.01.2019
 * Time: 13:43
 */

class EmailToUserTransformer implements DataTransformerInterface
{
    private $userRepository;
    private $finderCallback;

    public function __construct(UserRepository $userRepository, callable $finderCallback)
    {
        $this->userRepository = $userRepository;
        $this->finderCallback = $finderCallback;
    }

    public function transform($value)
    {
        if(null === $value){
            return '';
        }

        if(!$value instanceof User){
            throw new \LogicException('The UserSelectTextType can only be used with User objects!');
        }

        return $value->getEmail();
    }

    public function reverseTransform($value)
    {
        if(!$value){
            return;
        }

        $callback = $this->finderCallback;
        $user = $callback($this->userRepository, $value);

        if(!$user){
            throw new TransformationFailedException(sprintf(
                'Nu user found with email "%s"',
                $value
            ));
        }

        return $user;
    }

}