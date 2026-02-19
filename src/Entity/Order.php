<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null {
        get {
            return $this->id;
        }
    }

    #[ORM\Column(type: 'integer')]
    #[ORM\ManyToOne(targetEntity: User::class, cascade: ['persist'], inversedBy: 'UserOrders')]
    private int $userId {
        get {
            return $this->userId;
        }
        set {
            $this->userId = $value;
        }
    }

    #[ORM\Column(type: 'integer')]
    private int $serviceId {
        get {
            return $this->serviceId;
        }
        set {
            $this->serviceId = $value;
        }
    }

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email {
        get {
            return $this->email;
        }
        set {
            $this->email = $value;
        }
    }

    #[ORM\Column(type: 'integer')]
    #[ORM\ManyToOne(targetEntity: Service::class, cascade: ['persist'], inversedBy: 'ServiceOrders')]
    private int $price {
        get {
            return $this->price;
        }
        set {
            $this->price = $value;
        }
    }

}
