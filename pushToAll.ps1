# Array of user branches
$userBranches = @("3ra2y", "Enas", "Sofy", "Waleed")

# Loop over each user branch
foreach ($userBranch in $userBranches) {
    # Switch to the main branch
    git checkout main

    # Pull changes from the remote main branch
    git pull origin main

    # Switch to the user branch
    git checkout $userBranch

    # Merge changes from the main branch into the user branch (if needed)
    git merge main

    # Push the changes to GitHub
    git push origin $userBranch
}
