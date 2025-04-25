@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf
        <!-- Step 1 -->
      <div id="step1" class="container row form-step active">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">First, let's start with a punchy title!</h1>
          <p class="lead text-black">Your project title should be clear, concise, and direct to the point, to avoid miscommunication with the applicants.</p>
        </div>
        <div class="col-12 col-md-6 mb-3 ">
          <label for="projectTitle" class="form-label">Project Title</label>
          <input type="text" id="projectTitle" name="title" class="form-control border-dark border-2" required/>
          <p class="lead fs-3 pt-3 text-black"> Suggested titles:</p>
          <ul class="lead text-black">
            <li>I need a Front-end Web developer for my e-commerce website.</li>
            <li>I am looking for a delivery boy for my Carinderia.</li>
            <li>I am searching for a furniture maker customized for toddlers and below.</li>
          </ul>
        </div>
      </div>

      <!-- Step 2 -->
      <div id="step2" class="container row form-step d-none">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">To which category do you think your current needs fit?</h1>
          <p class="lead text-black">Categorization aids your future employee to see your post and know your intentions.</p>
        </div>
        <div class="col-12 col-md-6 mb-3 ">
          <label for="projectCategory" class="form-label">Category</label>
          <input type="text" id="projectCategory" name="category" class="form-control border-dark border-2" required>
          <p class="lead fs-3 pt-3 text-black"> Suggested Categories:</p>
          <ul class="lead text-black">
            <li>Front-end design</li>
            <li>Construction</li>
            <li>Delivery services</li>
          </ul>
        </div>
      </div>
      <!--Step 3-->
      <div id="step3" class="container row form-step d-none">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">What kind of service are you seeking?</h1>
          <p class="lead text-black">Additional field will be required for a more specific post.</p>
        </div>
        <div class="col-12 col-md-6 mb-3 ">
          <label class="form-label d-block text-dark mb-3">Type of Service</label>
          <div class="d-flex justify-content-around">
            <div class="form-check form-check-inline mb-3">
              <input class="form-check-input fs-3 fw-bold" type="radio" name="type" id="onlineOption" value="Online" required>
              <label class="form-check-label fs-3" for="onlineOption">Online</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input fs-3" type="radio" name="type" id="offlineOption" value="Offline" required>
              <label class="form-check-label fs-3" for="offlineOption">Offline</label>
            </div>
          </div>
          
        </div>
        
        <!-- Online fields -->
        <div class="row d-none" id="onlineGroup">
          <div class="col-12 col-md-6 mb-3 pe-md-4">
            <h1 class="display-6 fw-bold text-dark">Where do you want it submitted?</h1>
            <p class="lead text-black">Specify the platform or website you want the submission on.</p>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="platform" class="form-label">Platform of Submission</label>
            <input type="text" id="platform" name="platform" class="form-control border-2 border-dark" required>
            <p class="lead fs-3 pt-3 text-black"> Examples of platform:</p>
            <ul class="lead text-black">
              <li>Facebook Messenger</li>
              <li>Email</li>
              <li>Github</li>
            </ul>
          </div>
        </div>
        
        <!-- Offline fields -->
        <div class="row d-none" id="offlineGroup">
          <div class="col-12 col-md-6 mb-3 pe-md-4">
            <h1 class="display-6 fw-bold text-dark">Where is the service site?</h1>
            <p class="lead text-black">Specify the location where the work will take place or handed.</p>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control border-2 border-dark"required>
            <p class="lead fs-3 pt-3 text-black"> Examples of location:</p>
            <ul class="lead text-black">
              <li>123 Juan dela Cruz Street</li>
              <li>City College of Angeles</li>
              <li>Nepo Mall</li>
            </ul>
          </div>
        </div>
        
      </div>
      <!--Step4-->
      <div id="step4" class="container row form-step">
        <div class="col-12 col-md-6 mb-3 pe-md-5">
          <h1 class="display-6 fw-bold text-dark">What is the estimated Time to Finish</h1>
          <p class="lead text-black">How long do you expect this service to take?</p>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label class="form-label d-block text-dark mb-3">Select Duration</label>
          <div class="d-flex flex-column gap-3">
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="time_estimate" id="oneToThree" value="1-3 months" required>
              <label class="form-check-label fs-5 text-dark" for="oneToThree">1–3 months</label>
              <p class="lead text-black">The task is likely not very complex and doesn't have a very large scale.</p>
            </div>
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="time_estimate" id="threeToSix" value="3-6 months" required>
              <label class="form-check-label fs-5 text-dark" for="threeToSix">3–6 months</label>
              <p class="lead text-black">The task likely has a degree of complexity and larger scope that it requires longer time to finish</p>
            </div>
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="time_estimate" id="moreThanSix" value="More than 6 months" required>
              <label class="form-check-label fs-5 text-dark" for="moreThanSix">More than 6 months</label>
              <p class="lead text-black">The task probably has a very large scale and requires complex methods.</p>
            </div>
          </div>
        </div>
      </div>
      
      <!--Step5-->
      <div id="step5" class="container row form-step">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">Expected Expertise</h1>
          <p class="lead text-black">What level of expertise are you expecting for this job?</p>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label class="form-label d-block text-dark mb-3">Select Expertise Level</label>
          <div class="d-flex flex-column gap-3">
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="expertise_level" id="entryLevel" value="Entry" required>
              <label class="form-check-label fs-5 text-dark" for="entryLevel">Entry</label>
              <p class="lead text-black">The applicant doesn't necessarily need a degree or long years of experience in the industry to be able to fulfill the tasks.</p>
            </div>
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="expertise_level" id="immediateLevel" value="Immediate" required>
              <label class="form-check-label fs-5 text-dark" for="immediateLevel">Immediate</label>
              <p class="lead text-black">The applicant needs sufficient experience and should meet particular academic and/or professional credentials to qualify..</p>
            </div>
            <div class="form-check">
              <input class="form-check-input fs-5 border-dark" type="radio" name="expertise_level" id="expertLevel" value="Expert" required>
              <label class="form-check-label fs-5 text-dark" for="expertLevel">Expert</label>
              <p class="lead text-black">The applicant needs to be an expert in the field in order to be reliable enough to be able to fulfill the task despite its complexity.</p>
            </div>
          </div>
        </div>
      </div>
      
      <!--step6-->
      <div id="stepSalary" class="container row form-step d-none">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">How much are you offering for this job?</h1>
          <p class="lead text-black">Indicate a realistic budget based on the complexity and urgency of the task.<br>Please provide a realistic offer according to the service you are demanding.</br></p>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="salary" class="form-label">Proposed Salary (₱)</label>
          <input type="number" id="salary" name="salary" class="form-control border-dark border-2" required min="0" />
          <p class="lead fs-3 pt-3 text-black"> Example Ranges:</p>
          <ul class="lead text-black">
            <li>₱150 - ₱500 for basic errands</li>
            <li>₱500 - ₱2,000 for skilled online work</li>
            <li>₱1,000 - ₱5,000+ for construction or specialized labor</li>
          </ul>
        </div>
      </div>
      <!--step7-->
      <div id="step7" class="container row form-step d-none">
        <div class="col-12 col-md-6 mb-3 pe-md-4">
          <h1 class="display-6 fw-bold text-dark">What do you want your applicant to know?</h1>
          <p class="lead text-black">
            Write a clear and professional job description. This can include responsibilities, expectations, preferred qualities, or a personal message that reflects your values.
          </p>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="jobDescription" class="form-label">Job Description</label>
          <textarea id="jobDescription" name="description" rows="7" class="form-control border-dark border-2" required></textarea>
          <p class="lead fs-3 pt-3 text-black"> What you may include:</p>
          <ul class="lead text-black">
            <li>Specific duties or tasks involved</li>
            <li>Working hours or deadlines</li>
            <li>Your expectations on professionalism and communication</li>
            <li>Personal touch – Why you’re hiring, your vision, etc.</li>
          </ul>
        </div>
      </div>
      
      <div class="container">
        <div class="row flex-column-reverse flex-md-row">
          <div class="col-12 col-md-6 mb-3">
            <button type="button" class="btn btn-outline-dark w-100" id="prevBtn">Back</button>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <button type="button" class="btn btn-danger w-100" id="nextBtn">Next</button>
            <button type="submit" class="btn btn-danger w-100 d-none" id="submitBtn">Submit</button>
          </div>
        </div>
      </div>
    </form>
</div>
@endsection
<script src="{{ asset('js/post.js') }}"></script>

