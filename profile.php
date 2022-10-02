<form action="" method = "POST" style  = "width: 500px; margin: auto; ">
    <?php foreach($data as $r) {
    ?>
        <h2 class = "text-center"> YOUR PROFILE DATA </h2>
            <div class="mb-3">
                <label for="emri" class="form-label">Emri</label>
                <input type="text" class="form-control" placeholder = "<?php echo $r['emri'] ;?>">
            </div>

            <div class="mb-3">
                <label for="mbiemri" class="form-label">Mbiemri</label>
                <input type="text" class="form-control" placeholder = "<?php echo $r['mbiemri'] ;?>">

            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder = "<?php echo $r['email'] ;?>">

            </div>

            <div class="mb-3">
                <label for="adresa" class="form-label">Adresa</label>
                <input type="text" class="form-control" placeholder = "<?php echo $r['adresa'] ;?>">

            </div>

            <div class="mb-3">
                <label for="telefoni" class="form-label">Telefoni</label>
                <input type="text" class="form-control" placeholder = "<?php echo $r['telefoni'] ;?>">

            </div>

            <div class="mb-3">
                <label for="qyteti" class="form-label">Qyteti</label>
                <input type="text" class="form-control" placeholder = "<?php echo $r['qyteti'] ;?>">

            </div>

        <?php }?>
    </form> 