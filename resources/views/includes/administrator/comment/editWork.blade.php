
<div class="modal" id="workModal" tabindex="-1" role="dialog" aria-labelledby="workModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h2 class="modal-title text-primary text-center">Work Experience Comment</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('comment.cv')}}">
        	 @csrf
           <input type="hidden" value="{{$cvdets->CV_ID}}" name="CV_ID">
           <input type="hidden" value="{{Auth::user()->SummitStaff->id}}" name="staffID">
           <input type="hidden" value="workexperience" name="section">
           <input type="hidden" value=" " name="workid" id="commentid">
      <div class="modal-body">
		<div class="row">
		<div class="col-md-12">
			<div class="container">

	  		<div class="form-group row">
		    <div class="col-md-12">

			  		<textarea name="comment" class="form-control  @error('comment') is-invalid @enderror" row="100" style="border-radius: 0;height: 100px" id="workcomment" required>
			  			
			  		</textarea>
		    </div>
		    </div>
		  	</div>	

  		</div>
		</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
