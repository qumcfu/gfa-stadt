function updateRole (membershipId, roleId) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/memberships/ajax/updateRole/" + membershipId + "/" + roleId,
        data : { },
        type : 'PUT',
        dataType : 'text',
        success : function(){
            $("#project-memberships-roles-holder-" + membershipId).load(location.href + " #project-memberships-roles-" + membershipId)
            $("#current-role-holder-" + membershipId).load(location.href + " #current-role-" + membershipId)
            reinitializeTooltips()
        }
    })
}

function toggleActive (membershipId) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/memberships/ajax/toggleActive/" + membershipId,
        data : { },
        type : 'PUT',
        dataType : 'text',
        success : function(){
            $("#project-memberships-user-holder-" + membershipId).load(location.href + " #project-memberships-user-" + membershipId)
            reinitializeTooltips()
        }
    })
}
