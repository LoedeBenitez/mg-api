<div class="shadow">
    <div class="container p-4 rounded">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="text-center">-Employee Login-</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img class="img-fluid" src="{{ asset('img/login_shoo.png') }}" alt="" width="300">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form action="POST" wire:submit.prevent="submit">
                            <label for="login_email">Email</label>
                            <input type="text" class="form-control mb-3" wire:model="email">

                            <label for="login_email">Password</label>
                            <input type="password" class="form-control mb-3" wire:model="password">

                            <button class="btn btn-primary rounded float-end" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
