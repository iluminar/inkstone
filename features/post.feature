@post
Feature: Post
    In order to publish my post
    As a registered user
    I want to create a post

    Scenario: post create page
        Given I go to "post/create"
        Then I should see "Create Post"
