<?php
class AddToCart
{
    private $sessionKey; // the key used to store the cart items in the session

    // constructor: sets the session key to use for the cart items
    public function __construct($sessionKey = 'cart')
    {
        $this->sessionKey = $sessionKey;
        // initialize the cart items in the session if they don't exist yet
        if (!isset($_SESSION[$this->sessionKey])) {
            $_SESSION[$this->sessionKey] = array();
        }
    }

    // adds an item to the cart
    public function addItem($item, $quantity = 1)
    {
        // if the item already exists in the cart, increment its quantity
        foreach ($_SESSION[$this->sessionKey] as &$cartItem) {
            if ($cartItem['item'] === $item) {
                $cartItem['quantity'] += $quantity;
                return;
            }
        }
        // otherwise, add a new item to the cart
        $_SESSION[$this->sessionKey][] = array(
            'item' => $item,
            'quantity' => $quantity,
        );
    }

    // removes an item from the cart
    public function removeItem($item)
    {
        foreach ($_SESSION[$this->sessionKey] as $index => $cartItem) {
            if ($cartItem['item'] === $item) {
                array_splice($_SESSION[$this->sessionKey], $index, 1);
                return;
            }
        }
    }

    // decrement the quantity of an item in the cart
    public function decrementQuantity($item, $quantity = 1)
    {
        foreach ($_SESSION[$this->sessionKey] as &$cartItem) {
            if ($cartItem['item'] === $item) {
                $cartItem['quantity'] -= $quantity;
                if ($cartItem['quantity'] <= 0) {
                    // if the quantity is now zero or less, remove the item from the cart
                    $this->removeItem($item);
                }
                return;
            }
        }
    }

    // returns the total number of items in the cart
    public function countItems()
    {
        $count = 0;
        foreach ($_SESSION[$this->sessionKey] as $cartItem) {
            $count += $cartItem['quantity'];
        }
        return $count;
    }

    // calculates and returns the total price of all items in the cart
    public function calculateTotalPrice()
    {
        $total = 0;
        foreach ($_SESSION[$this->sessionKey] as $cartItem) {

            $total += ($cartItem['item']->getPrice() * $cartItem['quantity']);
        }
        return $total;
    }
    // clears all items from the cart
    public function clearCart()
    {
        $_SESSION[$this->sessionKey] = array();
    }
}
