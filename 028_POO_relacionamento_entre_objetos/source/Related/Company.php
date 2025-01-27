<?php

namespace Source\Related;

class Company
{
    private $company;
    private $address;
    private $team;
    private $products;

    public function bootCompany($company, $address) {
        $this->company = $company;
        $this->address = $address;
    }

    public function boot($company, Address $address){
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function addTeamMember($job, $firstName, $lastName) {
        $this->team[] = new User($job, $firstName, $lastName);
    }
    public function getCompany() {
        return $this->company;
    }

    public function getAddress() : Address {
        return $this->address;
    }

    public function getTeam() {
        return $this->team;
    }

    public function getProducts() {
        return $this->products;
    }
}