<div class="container px-5 my-5 mx-auto">
    <div class="row p-3">
        <div class="col">
            <img id="profilePic" src="public/img/icons/profilePic.svg" alt="">
        </div>
        <div class="col-8">
            <?php userName(); ?>
        </div>
    </div>

    <div class="row p-3">
        <div class="col"></div>
        <div class="col-8">

            <div class="container">
                <p class="text-muted aboutTab"><small"><img class="mx-3" src="public/img/icons/person2.svg" alt=""></small>About</p>
                <a class="text-muted editTab" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><small"><img class="mx-3" src="public/img/icons/edit.svg" alt=""></small>Edit</a>
                <hr id="abouthr">
                <div class="row">
                    <?php userProfile(); ?>
                </div>
            </div>

        </div>
    </div>


</div>