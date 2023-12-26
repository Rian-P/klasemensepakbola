@extends('landing.layouts.app')
@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-3 shadow" style="background-color: #D3D3D3">
                <form id="dynamicForm" action="/dataskor/post" method="post">
                    @csrf
                    <div id="formSections">
                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tim_a" class="form-label">Nama Klub 1</label>
                                    <select class="form-control" id="tim_a" name="tim_a">
                                        <option value="" selected disabled>Pilih Klub 1</option>
                                        @foreach($klubs as $klub)
                                        <option value="{{ $klub->id }}">{{ $klub->Nama_Klub }}</option>
                                        @endforeach
                                    </select>
                                    @error('tim_a')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="skor_a" class="form-label">Skor Klub 1:</label>
                                    <input class="form-control" type="number" name="skor_a" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tim_b" class="form-label">Nama Klub 2</label>
                                    <select class="form-control" id="tim_b" name="tim_b">
                                        <option value="" selected disabled>Pilih Klub 2</option>
                                        @foreach($klubs as $klub)
                                        <option value="{{ $klub->id }}">{{ $klub->Nama_Klub }}</option>
                                        @endforeach
                                    </select>
                                    <label for="skor_b " class="form-label">Skor Klub 2:</label>
                                    <input type="number" class="form-control" name="skor_b" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="button"
                                        class="btn btn-danger mt-5 float-right     remove-section">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('tim_b')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="button" class="btn btn-success mt-3" id="addSectionBtn">Add Form Section</button>
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
<style>
.remove-section {
    float: right;
}

.form-section {
    margin-bottom: 10px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 8px;
}

.form-label {
    font-weight: bold;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.row {
    display: flex;
    justify-content: space-between;
}

.col-md-4 {
    flex: 0 0 32%;
    max-width: 32%;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Event listener for the "Add Form Section" button
    $('#addSectionBtn').on('click', function() {
        addNewSection();
    });

    // Event listener for the "Remove" button within each form section
    $(document).on('click', '.remove-section', function() {
        $(this).closest('.form-section').remove(); // Remove the closest form section
    });

    // Event listener for form submission using AJAX
    $(document).on('click', '#dynamicFormSubmitBtn', function() {
        submitForm();
    });

    // Function to add a new form section dynamically
    function addNewSection() {
        var newSection = $('#formSections .form-section:first').clone(); // Clone the first form section
        newSection.find('input, select').val(''); // Clear input and select values

        // Append the new form section to the container
        $('#formSections').append(newSection);
    }

    // Function to submit the form using AJAX
    function submitForm() {
        var formData = $('#dynamicForm').serialize(); // Serialize form data
        $.ajax({
            type: 'POST',
            url: '/dataskor/post',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }
        });
    }
});
</script>




@endsection