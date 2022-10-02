<div>
    <div class="row">
        <div class="col align-self-center">
            <label for="file" class="form-label"><b>Upload content</b></label>
            <input type="file"
                class="form-control shadow-none  @error('docFile') is-invalid @enderror"
                onchange="previewFile(this)" name="docFile">

        </div>
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </div>
    @error('docFile')
        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
