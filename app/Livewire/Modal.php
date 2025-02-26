<?php

    namespace App\Livewire;

    use Livewire\Component;
    use App\Models\Product;

    class Modal extends Component
    {
        public bool $isOpen = false;
        public $product = null;
        public ?int $productId = null;

        // Simple public method to open modal - no dependency injection issues
        public function openModal($productId = null)
        {
            $this->productId = $productId;
            $this->loadProduct();
            $this->isOpen = true;
        }

        public function closeModal()
        {
            $this->isOpen = false;
            $this->product = null;
            $this->productId = null;
        }

        protected function loadProduct()
        {
            if ($this->productId) {
                $this->product = Product::find($this->productId);
            }
        }

        public function render()
        {
            return view('livewire.modal');
        }
    }
