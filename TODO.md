# TODO

The following list comprises ideas, suggestions, and known issues, all of which are in consideration for possible implementation in future releases.

***This is not a roadmap or a task list.*** Just because something is listed does not necessarily mean it will ever actually get implemented. Some might be bad ideas. Some might be impractical. Some might either not benefit enough users to justify the effort or might negatively impact too many existing users. Or I may not have the time to devote to the task.

* Add support for action invocation as alternative (and safer if plugin happens to get deactivated) way of using provided functions?
* Add `c2c_is_at_index_from_end()`, like `c2c_is_at_index()`, but checks if the post is at X index from the end. (0 === last post, -1 === penultimate post)
* Add `c2c_get_post_by_index_from_end()` and `c2c_get_posts_by_index_from_end()`, as alternatives to their non-"_from_end" variants that treat the index as being relative to end of posts array

Feel free to make your own suggestions or champion for something already on the list (via the [plugin's support forum on WordPress.org](https://wordpress.org/support/plugin/post-index-helpers/) or on [GitHub](https://github.com/coffee2code/post-index-helpers/) as an issue or PR).
