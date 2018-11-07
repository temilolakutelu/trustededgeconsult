<?php include_once('header.php');?>


<section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3>Post a Job</h3>
                </div>
            </div>
</section>


<div class="banner_link">
            <div class="container">
                <div class="abnner_link_inner">
                    <a class="active" href="index.php">Home</a>
                    <a href="post-a-job.php">Post a Job</a>
                </div>
            </div>        
</div>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="section_fieldset">
        <form action="#" method="post">
    <fieldset>
        <div class="row">
            <div class="col-md-4">
        <p>Have an account?</p>
            </div>
           <div class="col-md-7">
               <button class="button button1">Sign-In</button>
               <br>
               <span>If you don’t have an account you can optionally create one below by entering your email address/username. Your account details will be confirmed via email.</span>
            </div>      
        </div>
            <br>
    </fieldset>
            
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Your Email<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="email" placeholder="email@yourdomain.com">
        </div>    
        </div>
    </fieldset>
            <br>
    
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Job Title</p>
            </div>
        <div class="col-md-8">
            <input type="text">
        </div>    
        </div>
    </fieldset>
            <br>
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Location</p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="e.g London, England">
            <br>
            <span>*Leave this blank if the location is not important*</span>
        </div>    
        </div>
    </fieldset>
            <br>
     <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Job Type</p>
            </div>
        <div class="col-md-8">
            <select>
                <option>Freelance</option>
                <option selected="selected">Full Time</option>
                <option >Internship</option>
                <option>Part Time</option>
                <option>Temporary</option>
            </select>
            <br>
        </div>    
        </div>
    </fieldset> 
          <br>  
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Description</p>
            </div>
        <div class="col-md-8">
            <textarea name="content" id="editor">
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
            <br>
        </div>    
        </div>
    </fieldset>
             <br>      
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Application email/URL</p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="Enter an email address or Website URL">
            <br>
        </div>    
        </div>
    </fieldset>  
            <br>
            <br>
            <br>
                <h4>Company Details</h4>
            <br>
   
       <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Company Name</p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="Enter the name of the company">
            <br>
        </div>    
        </div>
    </fieldset> 
           <br>
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Website<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="url" placeholder="https://">
            <br>
        </div>    
        </div>
    </fieldset>    
    <br>
    
    <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Tagline<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="Briefly describe your company">
            <br>
        </div>    
        </div>
    </fieldset>        
    <br>
            <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Video<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="A link to a video about your company">
            <br>
        </div>    
        </div>
    </fieldset>
            <br>
            
            <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Twitter username<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="text" placeholder="@yourcompany">
            <br>
        </div>    
        </div>
    </fieldset>
            <br>
            <fieldset>
        <div class="row">
            <div class="col-md-4">
                <p>Logo<span>(optional)</span></p>
            </div>
        <div class="col-md-8">
            <input type="file" placeholder="No file chosen">
            <span>Maximum file size: 2 MB</span>
            <br>
        </div>    
        </div>
    </fieldset>
         <br>
            <br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="button button1">Preview</button>        
 </form>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php include_once('footer.php');?>