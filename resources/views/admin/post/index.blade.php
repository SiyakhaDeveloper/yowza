@extends('layouts.master_dashboard_layout')

@section('main_content')
    <div
        class="mt-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 lg:mt-6"
    >
        <div class="flex h-8 items-center justify-between">
            <h2
                class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100"
            >
                All blog post articles
            </h2>
            <a
                href="#"
                class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
            >View All</a
            >
        </div>
        <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach($posts as $post)
            <div class="flex flex-col">
                <img class="h-44 w-full rounded-2xl object-cover object-center" src="{{url('upload/post_images/'.$post->image)}}" alt="image"/>
                <div class="card -mt-8 grow rounded-2xl p-4">
                    <div>
                        <a href="{{route('admin.post.show',$post->id)}}" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">{{$post->title}}</a>
                    </div>
                    <p class="mt-2 grow line-clamp-3">{{strip_tags($post->post_content)}}</p>
                    <p><a href="{{route('admin.post.show',$post->id)}}" class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                            Read Article
                        </a></p>
                    <div class="mt-4 flex items-center justify-between">
                        <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                            <div class="avatar size-6">
                                <img class="rounded-full" src="{{url('upload/post_images/Yowza_Icon_400px.png')}}" alt="avatar"/>
                            </div>
                            <span class="line-clamp-1 text-dark ">{{$post->user->name}}</span>
                        </a>
                        <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-dark">{{date('d-m-Y',strtotime($post->created_at))}}</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
