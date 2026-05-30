        const categoryFilter =
            document.getElementById("categoryFilter");

        const productCards =
            document.querySelectorAll(".product-card");

        categoryFilter.addEventListener("change", function () {

            const selectedCategory = this.value;

            productCards.forEach(card => {

                const category =
                    card.getAttribute("data-category");

                if (
                    selectedCategory === "all" ||
                    category === selectedCategory
                ) {

                    card.style.display = "";

                }
                else {

                    card.style.display = "none";

                }

            });

        });


        const sortProducts =
            document.getElementById("sortProducts");

        const productContainer =
            document.getElementById("productContainer");

        sortProducts.addEventListener("change", function () {

            const cards =
                Array.from(document.querySelectorAll(".product-card"));

            if (this.value === "low") {

                cards.sort((a, b) =>
                    a.dataset.price - b.dataset.price
                );

            }

            if (this.value === "high") {

                cards.sort((a, b) =>
                    b.dataset.price - a.dataset.price
                );

            }

            cards.forEach(card => {

                productContainer.appendChild(card);

            });

        });





document
.getElementById('categoryFilter')
.addEventListener('change', function(){

    let category = this.value;

    let products =
    document.querySelectorAll('.product-card');

    products.forEach(product => {

        if(
            category === 'all' ||
            product.dataset.category === category
        ){

            product.style.display = 'block';

        }else{

            product.style.display = 'none';

        }

    });

});

