@extends('layouts.app')

@section('title', 'Add New Case')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Add New Legal Case</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


    <form method="POST" action="{{ route('cases.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="case_title" class="form-label">Case Title *</label>
            <input type="text" name="case_title" class="form-control" id="case_title" required>
        </div>

        <div class="mb-3">
            <label for="case_number" class="form-label">Case Number</label>
            <input type="text" name="case_number" class="form-control" id="case_number" placeholder="To be updated later">
        </div>

        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name *</label>
            <input type="text" name="client_name" class="form-control" id="client_name" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="client_phone" class="form-label">Client Phone *</label>
                <input type="tel" name="client_phone" class="form-control" id="client_phone" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="client_email" class="form-label">Client Email</label>
                <input type="email" name="client_email" class="form-control" id="client_email" placeholder="Optional">
            </div>
        </div>

        <div class="mb-3">
            <label for="case_category" class="form-label">Case Category *</label>
            <select name="case_category" class="form-select" id="case_category" required>
                <option value="">Select category</option>
                <option value="Financial Fraud">Financial Fraud</option>
                <option value="Consumer Rights">Consumer Rights</option>
                <option value="Telecom Compliance">Telecommunication Compliance</option>
                <option value="ISO 27001">ISO:27001</option>
                <option value="Data Privacy">Data Privacy</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="case_description" class="form-label">Case Description *</label>
            <textarea 
    name="case_description" 
    class="form-control" 
    id="case_description" 
    rows="6" 
    required
></textarea>

</div>

        <div class="mb-3">
            <label for="date_filed" class="form-label">Date Case Filed *</label>
            <input type="date" name="date_filed" class="form-control" id="date_filed" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Next Action Date(s)</label>
            <div id="next-action-wrapper">
                <div class="input-group mb-2">
                    <input type="date" name="next_actions[]" class="form-control" placeholder="Next action date">
                    <button class="btn btn-outline-danger remove-action" type="button">Remove</button>
                </div>
            </div>
            <button type="button" id="add-action-btn" class="btn btn-sm btn-outline-primary">Add Another Next Action Date</button>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priority *</label>
            <select name="priority" class="form-select" id="priority" required>
                <option value="">Select priority</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Urgent">Urgent</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status *</label>
            <select name="status" class="form-select" id="status" required>
                <option value="">Select status</option>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Closed">Closed</option>
                <option value="On Hold">On Hold</option>
            </select>
        </div>

        <fieldset class="border p-3 mb-3">
            <legend class="w-auto px-2">Police Station & In-Charge Details</legend>
            
            <div class="mb-3">
                <label for="police_station_name" class="form-label">Police Station Name *</label>
                <input type="text" name="police_station_name" class="form-control" id="police_station_name" required>
            </div>

            <div class="mb-3">
                <label for="police_incharge_name" class="form-label">In-Charge Name *</label>
                <input type="text" name="police_incharge_name" class="form-control" id="police_incharge_name" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="police_incharge_phone" class="form-label">Contact Phone *</label>
                    <input type="tel" name="police_incharge_phone" class="form-control" id="police_incharge_phone" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="police_incharge_email" class="form-label">Contact Email</label>
                    <input type="email" name="police_incharge_email" class="form-control" id="police_incharge_email" placeholder="Optional">
                </div>
            </div>
        </fieldset>

        <fieldset class="border p-3 mb-3" id="opposing-parties-wrapper">
            <legend class="w-auto px-2">Opposing Party/Parties (Optional)</legend>
            <div class="opposing-party mb-3 border rounded p-3">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="opposing_parties[0][name]" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="opposing_parties[0][address]" class="form-control" rows="2"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="opposing_parties[0][phone]" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="opposing_parties[0][email]" class="form-control">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-primary" id="add-opposing-party-btn">Add Another Opposing Party</button>
        </fieldset>

        <div class="mb-3">
            <label for="legal_documents" class="form-label">Related Documents (PDF, images)</label>
            <input class="form-control" type="file" name="legal_documents[]" id="legal_documents" multiple>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Additional Notes / Legal Guidance</label>
            <textarea name="notes" class="form-control" id="notes" rows="3" placeholder="Optional"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Case</button>
    </form>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@34.1.0/build/ckeditor.js"></script>
<script>
    // Initialize CKEditor for WYSIWYG case description
    //ClassicEditor.create(document.querySelector('.wysiwyg')).catch(error => { console.error(error); });

    // Dynamic Next Action Date Fields
    document.getElementById('add-action-btn').addEventListener('click', function() {
        const wrapper = document.getElementById('next-action-wrapper');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `
            <input type="date" name="next_actions[]" class="form-control" placeholder="Next action date">
            <button class="btn btn-outline-danger remove-action" type="button">Remove</button>
        `;
        wrapper.appendChild(div);
    });

    document.getElementById('next-action-wrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-action')) {
            e.target.parentNode.remove();
        }
    });

    // Dynamic Opposing Parties Fields
    let partyIndex = 1;
    document.getElementById('add-opposing-party-btn').addEventListener('click', function() {
        const wrapper = document.getElementById('opposing-parties-wrapper');
        const div = document.createElement('div');
        div.classList.add('opposing-party', 'mb-3', 'border', 'rounded', 'p-3');
        div.innerHTML = `
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="opposing_parties[${partyIndex}][name]" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="opposing_parties[${partyIndex}][address]" class="form-control" rows="2"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="opposing_parties[${partyIndex}][phone]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="opposing_parties[${partyIndex}][email]" class="form-control">
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger remove-opposing-party">Remove</button>
        `;
        wrapper.insertBefore(div, this);
        partyIndex++;
    });

    document.getElementById('opposing-parties-wrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-opposing-party')) {
            e.target.parentNode.remove();
        }
    });
</script>
@endsection
