<form class="d-flex form-control mt-5" action="{{ route('search') }}" method="get">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search for products (e.g. eggs, milk, potato)..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
</form>
