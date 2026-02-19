<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null {
        get {
            return $this->id;
        }
    }

    #[ORM\Column(type: 'string')]
    private string $title {
        get {
            return $this->title;
        }
        set {
            $this->title = $value;
        }
    }

    #[ORM\Column(type: 'integer')]
    private string $price {
        get {
            return $this->price;
        }
        set {
            $this->price = $value;
        }
    }

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: "id")]
    private array $serviceOrders {
        get {
            return $this->serviceOrders;
        }
        set {
            $this->serviceOrders = $value;
        }
    }

}
