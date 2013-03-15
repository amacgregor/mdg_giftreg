<?php
class Mdg_Giftregistry_Test_Mink_Registry extends JR_Mink_Test_Mink
{
    public function testAddProductToRegistry()
    {
        $this->section('TEST ADD PRODUCT TO REGISTRY');
        $this->setCurrentStore('default');
        $this->setDriver('goutte');
        $this->context();

        // Go to homepage
        $this->output($this->bold('Go To the Homepage'));
        $url = Mage::getStoreConfig('web/unsecure/base_url');
        $this->visit($url);
        $category = $this->find('css', '#nav .nav-1-1 a');
        if (!$category) {
            return false;
        }

        // Go to the Login page
        $loginUrl = $this->find('css', 'ul.links li.last a');
        if ($loginUrl) {
            $this->visit($loginUrl->getAttribute('href'));
        }

        $login = $this->find('css', '#email');
        $pwd = $this->find('css', '#pass');
        $submit = $this->find('css', '#send2');

        if ($login && $pwd && $submit) {
            $email = 'user@example.com';
            $password = 'password';
            $this->output(sprintf("Try to authenticate '%s' with password '%s'", $email, $password));
            $login->setValue($email);
            $pwd->setValue($password);
            $submit->click();
            $this->attempt(
                $this->find('css', 'div.welcome-msg'),
                'Customer successfully logged in',
                'Error authenticating customer'
            );
        }

        // Go to the category page
        $this->output($this->bold('Go to the category list'));
        $this->visit($category->getAttribute('href'));
        $product = $this->find('css', '.category-products li.first a');
        if (!$product) {
            return false;
        }

        // Go to product view
        $this->output($this->bold('Go to product view'));
        $this->visit($product->getAttribute('href'));
        $form = $this->find('css', '#product_registry_form');
        if ($form) {
            $addToCartUrl = $form->getAttribute('action');
            $this->visit($addToCartUrl);
            $this->attempt(
                $this->find('css', '#btn-add-giftregistry'),
                'Product added to gift registry successfully',
                'Error adding product to gift registry'
            );
        }
    }
}
