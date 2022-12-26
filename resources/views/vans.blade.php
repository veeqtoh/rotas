@extends('layouts.layout')

@section('title')
    <title>Vans | Admin Portal</title>
@endsection

@section('vans')
    active
@endsection

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <livewire:vans/>
        <!-- End Content -->

        @include('layouts.includes.footer')

        <!-- Create a new Van Modal -->
        <div class="modal fade" id="addVanModal" tabindex="-1" aria-labelledby="addVanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="addVanModalLabel">Create New Van</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form wire:submit.prevent = 'addFolder'>
                            <!-- Form -->
                            <div class="mb-4">
                                <div class="mb-2 input-group mb-sm-0">
                                    <input wire:model.defer='name' type="text" class="form-control" name="name" min="2" placeholder="Folder name" aria-label="Folder name" required autofocus>

                                    <div wire:ignore.self class="input-group-append input-group-append-last-sm-down-none">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">

                                        </div>
                                        <!-- End Select -->

                                        <button class="btn btn-primary d-none d-sm-inline-block">create</button>
                                    </div>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                        </form>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
        <!-- End Create a new Van Modal -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
