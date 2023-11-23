<?php

namespace ElxDigital\RDStation\Data;

class Customer {

    /**
     * Eventos da API
     */
    // eventos padrão
    private $name;
    private $email;
    private $state;
    private $city;
    private $country;
    private $personalPhone;
    private $mobilePhone;
    // eventos personalizados
    private $cfBirthday;
    private $cfCustomerId;

    public function __construct() {
        
    }

    /**
     * #####################
     * ### evento padrão ###
     * #####################
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setState(string $state): void {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function setCity(string $city): void {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCountry(string $country): void {
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setPersonalPhone(string $personalPhone): void {
        $this->personalPhone = $personalPhone;
    }

    public function getPersonalPhone() {
        return $this->personalPhone;
    }

    public function setMobilePhone(string $mobilePhone): void {
        $this->mobilePhone = $mobilePhone;
    }

    public function getMobilePhone() {
        return $this->mobilePhone;
    }

    /**
     * ############################
     * ### evento personalizado ###
     * ############################
     */
    public function setBirthday(string $cfBirthday): void {
        $this->cfBirthday = date('d F Y', strtotime($cfBirthday));
    }

    public function getBirthday() {
        return $this->cfBirthday;
    }

    public function setCustomerId(string $cfCustomerId): void {
        $this->cfCustomerId = (string) str_pad($cfCustomerId, 4, 0, STR_PAD_LEFT);
    }

    public function getCustomerId() {
        return $this->cfCustomerId;
    }

}
