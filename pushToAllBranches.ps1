# Array of user branches
$userBranches = @("3ra2y", "Enas", "Sofy", "Waleed")
# $userBranches = @("3ra2y", "Enas", "Sofy", "Waleed" ,"Othman")


# Switch to the main branch
git checkout main

# commit & sync all changes before execution
git add .
git commit -m "commit changes via PS script"
git push -u origin main
# Pull changes from the remote main branch
git pull origin main

# Loop over each user branch
foreach ($userBranch in $userBranches) {

    # Switch to the main branch
    git checkout main
    # Switch to the user branch
    git checkout $userBranch

    # Merge changes from the main branch into the user branch (if needed)
    git merge main

    # Push the changes to GitHub
    git push origin $userBranch
}

# Switch to the main branch
git checkout main
