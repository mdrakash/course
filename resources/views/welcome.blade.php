<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <title>Course</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="{{route('create.course')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="title" class="form-label">Topic Title</label>
                    <input type="title" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="course_requirements" class="form-label">Course Requirements</label>
                    <textarea class="form-control" id="course_requirements" name="course_requirements" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="course_description" class="form-label">Course Description</label>
                    <textarea class="form-control" id="course_description" name="course_description" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Select Category</label>
                    <select name="category" id="category_id" class="form-select">
                        <option selected>Open this select menu</option>
                        <option value="One">One</option>
                        <option value="Two">Two</option>
                        <option value="Three">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subcategory" class="form-label">Select Subcategory</label>
                    <select class="form-select" name="subcategory" id="">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="level" class="form-label">Select Level</label>
                    <select class="form-select" id="level" name="level" aria-label="Default select Level">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="lang" class="form-label">Language</label>
                    <input class="form-control font-style" required="required" name="lang" type="text" id="lang">
                </div>
                <div class="col-md-6">
                    <label for="duration" class="form-label">Duration</label>
                    <input class="form-control font-style" name="duration" type="text" id="duration">
                </div>
                <div class="col-md-6">
                    <label for="thumbnail" class="form-label">Upload thumbnail</label>
                    <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6 mt-5 ml-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="is_free" name="is_free">
                                <label for="is_free" class="form-check-label">This is free</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6 ml-auto d-block" id="price">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control font-style" name="price" type="text" id="price">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-block" id="discount-div">
                    <div class="row">
                        <div class="form-group col-md-6 mt-5 ml-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="has_discount" name="has_discount">
                                <label for="has_discount" class="form-check-label">Discount</label>
                            </div>

                        </div>
                        <div class="form-group col-md-6 ml-auto d-block" id="discount">
                            <label for="discount" class="form-label">Discount</label>
                            <input class="form-control font-style" name="discount" type="text" id="discount">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12 mt-5 ml-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="featured_course" name="featured_course">
                                <label for="featured_course" class="form-check-label">Featured Course</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12 mt-5 ml-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="is_preview" name="is_preview">
                                <label for="is_preview" class="custom-control-label form-check-label">Preview</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 mt-4 ml-auto d-block" id="preview_type">
                    <label for="preview_type" class="form-label">Preview Type</label>
                    <select class="form-control font-style" id="preview_type" name="preview_type">
                        <option value="Video File">Video File</option>
                        <option value="Image">Image</option>
                        <option value="iFrame">iFrame</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 mt-4 d-block" id="preview-video-div">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-file mb-3">
                                <label for="preview_video" class="form-label">Preview Video</label>
                                <input type="file" class="form-control" name="preview_video" id="preview_video" aria-label="file example">
                                <div class="invalid-feedback">invalid form file</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12 col-lg-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="15"></textarea>
                </div>
                <div class="form-group col-md-12 col-lg-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="15"></textarea>
                </div>
                <div class="row mb-4 float-end">
                    <div class="col-lg-12 text-right text-end float-end">
                        <input type="submit" value="Save" class="btn btn-primary btn-submit" id="submit-all">
                    </div>
                </div>
            </div>
        </form>
    </div>






















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>

</html>