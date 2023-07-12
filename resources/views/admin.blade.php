<x-layout>
    <div class="container py-md-5 container--narrow">
        @unless ($posts->isEmpty())
            {{-- placeholder --}}
            <div class="profile-nav nav nav-tabs pt-2 mb-4">
                <a href="#" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "" ? "active" : ""}}  ">Posts: {{$postCount}}</a>
                <a href="#" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "" ? "active" : ""}}  ">Users: {{$userCount}}</a>
            </div>
            <h2 class="text-center mb-4">Posts Of All Current Users  </h2>
            <div class="list-group">
                @foreach ($posts as $post)
                <x-post :post="$post"/>
                @endforeach
              </div>
              {{-- <div class="mt-4">
              {{$posts->links()}}
            </div> --}}
        @else
          <div class="text-center">
            <h2>Hello <strong>{{auth()->user()->username}}</strong>, your feed is empty.</h2>
            <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top menu bar to find content written by people with similar interests and then follow them.</p>
          </div>
        @endunless
      </div>
</x-layout>
