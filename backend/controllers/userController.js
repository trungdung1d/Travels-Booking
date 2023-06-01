import User from '../models/User.js'

//create a new User
export const createUser = async (req, res) => {
    const newUser = new User(req.body)
    try {
        const savedUser = await newUser.save()
        res.status(200).json({success: true, message: 'Successfully created', data: savedUser})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to created. Please try again'})
    }
}

//update User
export const updateUser = async(req, res) => {

    const id = req.params.id

    try {
        const updatedUser = await User.findByIdAndUpdate(id,{
            $set: req.body}, {new: true})

        res.status(200).json({success: true, message: 'Successfully updated', data: updatedUser})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to updated. Please try again'})
    }
}

//delete User
export const deleteUser = async(req, res) => {
    const id = req.params.id

    try {
        await User.findByIdAndDelete(id)

        res.status(200).json({success: true, message: 'Successfully deleted'})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to deleted. Please try again'})
    }
}

//get single User
export const getSingleUser = async(req, res) => {
    const id = req.params.id

    try {
        const singleUser = await User.findById(id)

        res.status(200).json({success: true, message: 'Successfully founded', data: singleUser})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}

//get all tour
export const getAllUser = async(req, res) => {



    try {
        const allUser = await User.find({}).skip(page*8).limit(8)
        res.status(200).json({success: true, message: 'Successfully founded', data: allUser})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}