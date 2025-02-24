<?php $page = 'Invoice Templates'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.breadcrumb')
            @slot('title') Invoice Templates @endslot
            @slot('li_1') Manage your invoice Templates @endslot
        @endcomponent
        
        <div class="row">
            @foreach($templates as $template)
                <div class="col-md-4">
                    <div class="template-card {{ $template['active'] ? 'active-template' : '' }}" 
                         data-template="{{ $template['template_name'] }}">
                        <div class="card-body">
                            <img src="{{ asset('build/img/invoices/'.$template['template_name'].'.png') }}" 
                                 alt="{{ $template['template_name'] }}" 
                                 class="template-img">
                            <h5 class="card-title">{{ $template['template_name'] }}</h5>
                            <p class="active-status {{ $template['active'] ? 'active' : 'inactive' }}">
                                {{ $template['active'] ? 'Active' : 'Inactive' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.template-card {
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 20px;
    cursor: pointer;
    background: #fff;
}

.template-card:hover {
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.template-img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-bottom: 1px solid #e0e0e0;
}

.card-title {
    margin-top: 15px;
    font-size: 18px;
    font-weight: 600;
    text-align: center;
    color: #333;
}

.active-template {
    border-color: #4CAF50;
    box-shadow: 0 0 15px rgba(76, 175, 80, 0.3);
}

.active-status {
    text-align: center;
    font-size: 14px;
    font-weight: 500;
    margin-top: 10px;
    padding: 5px 15px;
    border-radius: 20px;
    display: inline-block;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}

.active-status.active {
    background-color: rgba(76, 175, 80, 0.1);
    color: #4CAF50;
}

.active-status.inactive {
    background-color: rgba(158, 158, 158, 0.1);
    color: #9e9e9e;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.template-card');
    
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const templateName = this.dataset.template;
            
            fetch('/set-active-template', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ template_name: templateName })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cards.forEach(c => {
                        c.classList.remove('active-template');
                        const status = c.querySelector('.active-status');
                        status.classList.remove('active');
                        status.classList.add('inactive');
                        status.textContent = 'Inactive';
                    });
                    
                    this.classList.add('active-template');
                    const activeStatus = this.querySelector('.active-status');
                    activeStatus.classList.remove('inactive');
                    activeStatus.classList.add('active');
                    activeStatus.textContent = 'Active';
                    
                    toastr.success('Template activated successfully');
                } else {
                    toastr.error('Failed to activate template');
                }
            })
            .catch(error => {
                toastr.error('An error occurred while activating the template');
            });
        });
    });
});
</script>
@endsection